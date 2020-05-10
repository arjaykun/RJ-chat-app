<template>
	
	<div 
		v-if="message.sent && this.sent === false" 
		class="d-flex flex-column mb-2 align-items-end">

		<small class="name text-muted px-2">
				{{message.user.name}}
		</small>
		<div class="bg-muted py-2 px-3 rounded text-white message-box">
			<div class="message">		
				{{ message.message }}
				<small class="text-light font-italic">
					- {{ humanizeDate }}
				</small>
			</div>
		</div>
		
	</div>
	
	<div class="d-flex flex-column mb-2 align-items-end" v-else-if="isSelf">
		<small class="name text-muted px-2">
				{{message.user.name}}
		</small>
		<div class="bg-primary py-2 px-3 rounded text-white message-box">
			<div class="message">		
				{{ message.message }}
				<small class="text-light font-italic">
					- {{ humanizeDate }}
				</small>
			</div>
		</div>
	</div>

	<div class="d-flex flex-column mb-2 align-items-start" v-else-if="!isSelf">
		<small class="name text-muted px-2">
				{{message.user.name}}
		</small>
		<div class="bg-light py-2 px-3 rounded text-dark message-box">
			<div class="message">		
				{{ message.message }}
				<small class="text-secondary font-italic">
				- {{ humanizeDate }}
				</small>
			</div>
		</div>
	</div>

</template>

<script>
import moment from 'moment';

export default {

  name: 'Message',
  props: ['message', 'self'],

 	computed: {
 		isSelf() {
 			return +this.message.user.id === +this.self
 		}, 
 		humanizeDate() {
 			const now = moment(new Date());
 			const created_at = moment(this.message.created_at);
 			return moment.duration(created_at.diff(now)).humanize(true);
 		}
 	}
}
</script>

<style lang="css" scoped>
	
	.rounded {
		border-radius: 50px !important;
	}
	.message-box {
		display: inline-block;
		width: auto;
	}

	.name {
		
	}


</style>