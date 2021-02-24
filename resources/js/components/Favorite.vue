<template>
	<button type="submit" class="btn btn-secondary flex" @click="toggle">
	 			<span class="fa fa-heart"></span>
	 			<span v-text="favoriteCount"></span>	 
	 			</button>
</template>

<script>
	export default {

		props: ['reply'],	

		data(){
			return{
				favoriteCount: 10
			}
		},

		methods:{
			toggle() {
				if(this.isFavorited){
					axios.delete('/replies/' + this.reply.id + '/favorites');
				}else{
					axios.post('/replies/' + this.reply.id + '/favorites')
				}
			}
		}


	}
</script>