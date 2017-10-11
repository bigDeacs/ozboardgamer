Vue.component('games', {
	template: '#games-template',
	props: ['list'],
	created() {
		this.list = JSON.parse(this.list);
	}
});

new Vue({
	
});