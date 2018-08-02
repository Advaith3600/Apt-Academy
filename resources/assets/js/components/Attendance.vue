<template>
	<div class="d-flex align-items-center">
		<label :for="'present' + id" class="mb-0 mr-1">Present</label>
		<input type="radio" v-model="attendance" :id="'present' + id" class="mr-2" :value="true">

		<label :for="'absent' + id" class="mb-0 mr-1">Absent</label>
		<input type="radio" v-model="attendance" :id="'absent' + id" :value="false">
	</div>
</template>

<script>
	export default {
		props: ['id', 'selected'],
		data() {
			return {
				attendance: ''
			}
		}, 
		watch: {
			attendance: function (event) {
				axios.post(`/admin/attendance/update/${this.id}`, {
					attendance: this.attendance
				});
			}
		},
		mounted() {
			if (this.selected != '') {
				this.attendance = Boolean(Number(this.selected));
			}
		}
	}
</script>