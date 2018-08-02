<template>
	<div class="d-flex align-items-center">
		<label :for="getId.present" class="mb-0 mr-1">Present</label>
		<input type="radio" v-model="attendance" :id="getId.present" class="mr-2" :value="true">

		<label :for="getId.absent" class="mb-0 mr-1">Absent</label>
		<input type="radio" v-model="attendance" :id="getId.absent" :value="false">
	</div>
</template>

<script>
	export default {
		props: ['id', 'selected', 'date'],
		data() {
			return {
				attendance: '',
				getId: {
					present: '',
					absent: ''
				}
			}
		},
		watch: {
			attendance: function (event) {
				axios.post(`/admin/attendance/update/${this.id}`, {
					attendance: this.attendance,
					date: this.date
				});
			}
		},
		mounted() {
			if (this.selected != '') {
				this.attendance = Boolean(Number(this.selected));
			}

			this.getId.present = 'present' + this.id + Math.random().toString(36).substr(2, 9);
			this.getId.absent = 'absent' + this.id + Math.random().toString(36).substr(2, 9);
		}
	}
</script>