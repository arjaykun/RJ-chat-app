<template>
	
	<div class="w-100" v-if="message.loading">
		<div class="d-flex justify-content-center">
			<img :src="spinner" alt="loading..." height="30" width="30">
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
  data() {
  	return {
  		spinner: window.host + "/spinner.svg",
  	}
  },
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