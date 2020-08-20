<template>
	<div>
			
			<div class="p-3 bg-primary text-white w-100 rounded-top align-items-center">
				<h6 class="font-weight-bold" style="padding:0; margin:0;">
				<i class="fas fa-users"> </i> Online Users
				</h6>
			</div>
			
			<div>
				<ul class="list-group p-2">
				  <li 
				  	class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" 
				  	v-for="u in users"
				  	:key="u.id"
				  	:class="{'bg-info':u.id==user.id}"
				  >
					  <div class="d-flex align-items-center" >
					  	<img :src="u.avatar" :alt="u.name" width="50" height="50" class="mr-3 rounded-circle"> 
					   	<div class="mr-2">
					   		{{ u.name }} <br> {{ u.email }}
					   	</div>
					  </div>
				   	
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
				const classes = ['badge', 'badge-primary', 'p-2'];
				if(userRef.innerText.trim() == ""){
					userRef.classList.add(...classes);    
  			  userRef.innerHTML = "<i class='fas fa-keyboard text-white'> </i>";

  			  setTimeout( function() {
  			  		userRef.classList.remove(...classes);    
			  			userRef.innerHTML = "";
  			  }, 5000)
				}
				
   	 	})
  },
}
</script>

<style lang="css" scoped>
</style>