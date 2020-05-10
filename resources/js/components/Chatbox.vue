<template>  
	<div class="d-flex justify-content-center align-items-start w-100 h-100 flex-wrap">
		<div class="chatbox mb-3 mx-2">
			<div class="d-flex flex-column bg-white shadow rounded">

				<div class="p-3 bg-primary text-white w-100 rounded-top align-items-center">
					<h6 class="font-weight-bold" style="padding:0; margin:0;">
						{{ room.name }}
					</h6>
				</div>

				<div v-chat-scroll class="w-100 p-2 box-height">
					<div v-for="(message, index) in messages" :key="index">
						<Message :message="message" :self="user.id" />
					</div>
				</div>

				<div class="d-flex align-items-center border-top rounded-bottom">
				  <input 
				  	type="text" 
				  	class="rounded-bottom-left input-chat p-3 " 
				  	placeholder="your message..." 
						v-model="message"
						@keyup.enter="sendMessage"
						@keydown="listenUserTyping"
				  >
			    <button 
			    	class="btn btn-primary p-3 rounded-bottom-right" 	
			    	type="button "
			    	@click="sendMessage"
			    	:disabled="sendLoading"
			    >
			    	Send
			  	</button>
				</div>
			</div>
			
		</div>


		<div class="bg-white shadow chatbox mx-2" style="height:520px">
			<UserList :users="users" :user="user" />
		</div>

	</div>
</template>
<!-- ui-avatars.com -->
<script>
import Message from './Message';
import UserList from './UserList';

export default {

  name: 'Chatbox',
  props: ['user', 'room'],
  components: {
  	Message,
  	UserList,
  },
  data () {
    return {
    	users: [
    		{id:1,name: 'John Wick', email: 'test.email@gmail.com'},
    		{id:2,name: 'Ethan Hunt', email: 'test.email@gmail.com'},
    		{id:3,name: 'John Doe', email: 'test.email@gmail.com'},
    		{id:4,name: 'XXX', email: 'test.email@gmail.com'},
    	],
    	messages: [],
    	message: '',
    	sendLoading: false,
    	loading: false,
    }
  },

  created(){
  	this.getMessages();
  	Echo.join(`chat.${this.room.id}`)
  		.here( users => {

  			this.users = users;

  			this.messages.push({
        	message: `Yow. Welcome to ${this.room.name} ${this.user.name}.`,
        	user: { name: 'System' }
        });

  		})
  		.joining((user) => {

        this.users.push(user);

        this.messages.push({
        	message: `${user.name} has joined the room.`,
        	user: { name: 'System' }
        });

	    })
	    .leaving((user) => {

	      this.users = this.users.filter( u => u.id !== user.id);
	      const message = {
        	message: `${user.name} has left the room.`,
        	user: { name: 'System' }
        }
        
        this.messages.push(message);
	    })
			.listen('ChatEvent', event => {

				this.messages.push(event.message);

			})
			.listenForWhisper('typing', user => { 
				const userRef = this.$refs["user_"+user.id][0];
				const classes = ['badge', 'badge-warning'];
				if(userRef.innerText.trim() == ""){
					userRef.classList.add(...classes);    
  			  userRef.innerText = "typing";

  			  setTimeout( function() {
  			  		userRef.classList.remove(...classes);    
			  			userRef.innerText = "";
  			  }, 2000)
				}
				
   	 	});
  },

  methods: {
  	sendMessage: async function() {
  		if (this.message.trim().length > 0) {

  			try { 
  				this.sendLoading = true;
  				const temp = this.message;
  				this.message = '';

	  			const res = await axios
	  													.post('/chat/messages', 
	  															{message:temp, room_id:this.room.id});

	  			if (res.status === 201 || res.status === 200) {  

						this.messages.push({
		  				message: temp,
		  				user: this.user,
						});
	  			}

  			} catch(err) { 				
						this.messages.push({
		  				message: 'Oh snap! Failed to send message.',
        			user: { name: 'System' }
						});
  			} finally {
		  		this.sendLoading = false;
  			}
  		}
  	}, 

  	async getMessages() {
  		try {
  			this.loading = true;
				const response = await axios.get(`/chat/messages/${this.room.id}`);
				this.messages = response.data;
  			this.loading = false;
  		} catch(err) {
  			console.log(err)
  		}
  		
  	},

  	listenUserTyping() {
  		if(this.users.length > 1) {		
  			Echo.join(`chat.${this.room.id}`)
  					.whisper('typing', this.user); 
  		}
  	}, 


  }
}
</script>

<style lang="css" scoped>
	.chatbox {
		width: 380px;
	}
	
	.userbox {
		width:240px;
	}

	.box-height {
		height: 420px; 
		overflow-y:scroll;
	}

	.input-chat {
		border: none;
		outline: none;
		width: 100%;
	}

	.btn {
		border:0;
		border-radius: 0;
		width: 20%;
		height: 100%;
	}
	.rounded-bottom-left {
		border-radius: 0 0 0 4px;
	}

	.rounded-bottom-right {
		border-radius: 0 0 4px 0;
	}
</style>