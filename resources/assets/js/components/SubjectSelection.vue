<template>
	<div v-if="allSubjects.length > 0">	
	    <div class="form-group" v-if="standard != 0 && currentStandard != undefined && currentStandard.subjects[0][2] != true">
	    	<label for="standard" class="col-form-label">Select subject</label>

			<div class="d-flex align-items-center flex-wrap">
				<template v-for="subjects in currentStandard.subjects">
					<input :id="subjects[0]" type="checkbox" v-model="subject" :value="subjects" name="subject-select" class="mr-1">
		    		<label :for="subjects[0]" class="mr-2 mb-0" v-text="subjects[0]"></label>
				</template>
			</div>
	    </div>

	    <input type="hidden" :value="inputValue" name="subject">
	</div>
</template>

<script>
	export default {
		props: ['standard', 'select'],
		data() {
			return {
				allSubjects: [],
				subject: []
			}
		},
		computed: {
			currentStandard: function () {
				return this.allSubjects.filter(u => u.id == this.standard)[0];
			},
			inputValue: function () {
				if (this.currentStandard != undefined && this.currentStandard.subjects[0][2] == true) {
					return JSON.stringify(this.currentStandard);
				}

				return JSON.stringify(this.subject);
			}
		},
		watch: {
			standard: function () {
				this.subject = [];
			},
			subject: function () {
				this.$emit('subjectchanged', this.subject);
			}
		},
		mounted() {
			axios.post('/get/standards').then(({data}) => {
				this.allSubjects = data;
			});

			try {
				if (JSON.parse(this.select) instanceof Array) {
					this.subject = JSON.parse(this.select);
				}
			} catch (e) {}
		}
	}
</script>