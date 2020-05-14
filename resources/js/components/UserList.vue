<template>
	<div>
			
			<div class="p-3 bg-primary text-white w-100 rounded-top align-items-center">
				<h6 class="font-weight-bold" style="padding:0; margin:0;">Online Users</h6>
			</div>
			
			<div>
				<ul class="list-group p-2">
				  <li 
				  	class="list-group-item list-group-item-action" 
				  	v-for="u in users"
				  	:key="u.id"
				  	:class="{'bg-info':u.id==user.id}"
				  >
				   	<img :src="u.avatar" :alt="u.name" width="30" height="30" class="mr-1"> {{ u.name }} ( {{ u.email }} )
				  	<span :ref="'user_'+u.id"></span>
				  </li>
				</ul>
			</div>
			  

	</div>
</template>

<script>
export default {

  name: 'UserList',
  props: ['users', 'user', 'room'],
  created() {
  	Echo
  		.join(`chat.${this.room.id}`)
  		.listenForWhisper('typing', user => { 
				const userRef = this.$refs["user_"+user.id][0];
				const classes = ['badge', 'badge-warning'];
				if(userRef.innerText.trim() == ""){
					userRef.classList.add(...classes);    
  			  userRef.innerText = "typing";

  			  setTimeout( function() {
  			  		userRef.classList.remove(...classes);    
			  			userRef.innerText = "";
  			  }, 5000)
				}
				
   	 	})
  },
}
</script>

<style lang="css" scoped>
</style>