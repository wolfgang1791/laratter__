<template>
	<div class="row" >
		<a href="#" class="btn btn-primary" v-on:click="load()">Ver Respuestas</a>
			<div class=" mt-2 col-12" v-for="response in responses">
				<div class="card">	
					<div class="card-block">
						{{response.message}}
					</div>
					<div class="card-footer text-muted">
						{{response.created_at}}
					</div>
				</div>	
			</div>
	</div>
</template>
<script>
	export default{
		props:['message'],
		data(){
			return {
				responses:[]
			}
		},
		methods:{
			load(){
				axios.get('/api/messages/'+this.message+'/responses').then(res=>{
					this.responses = res.data
				})
			}
		}
	}
</script>