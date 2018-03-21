<template>
    <div class="row col-md-12">
        <table class="table table-striped">
        <thead>
            <tr>
            <th class="text-center"> id </th>
			<th class="text-center"> user_id </th>
			<th class="text-center"> title </th>
			<th class="text-center"> content </th>
			<th class="text-center"> create </th>
			<th class="text-center"> update </th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="article in articles">
				<td class="text-center"> {{ article.id }} </td>
				<td class="text-center"> {{ article.user_id }} </td>
				<td class="text-left">
					<router-link :to="'/articles/' + article.id">{{ article.title }}</router-link>
				</td>
				<td class="text-left"> {{ article.content }} </td>
				<td class="text-center"> {{ article.created_at }} </td>
				<td class="text-center"> {{ article.updated_at }} </td>
			</tr>
		</tbody>
		</table>
	</div>
</template>

<script>
    export default {
        created() {
            this.fetchArticles()
        },
        data() {
            return {
                articles: []
            }
        },
        methods: {
            fetchArticles() {
                this.$http.get('/api/articles')
				.then(res => {
                    this.articles = res.data
                })
				.catch( error => { 
					alert(error)
					console.log(error)
				})
            }
        }
    }
</script>
