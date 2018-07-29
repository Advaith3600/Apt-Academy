<template>
	<div>	
	    <div class="form-group" v-if="standard != 0 && standard < 15">
	    	<label for="standard" class="col-form-label">Select subject</label>

			<div class="d-flex align-items-center flex-wrap">
		    	<template v-if="standard == 8 || standard == 9 || standard == 10">
		    		<input id="all" type="checkbox" v-model="subject" value="All Subject" name="subject-select">
		    		<label for="all" class="ml-1 mb-0">All Subject</label>
		    	</template>

		    	<template v-if="standard == 1 || standard == 2 || standard == 3 || standard == 4 || standard == 5 || standard == 6 || standard == 7 || standard == 11 || standard == 12 || standard == 13 || standard == 14">
		    		<input id="maths" type="checkbox" v-model="subject" value="Maths" name="subject-select">
		    		<label for="maths" class="ml-1 mb-0">Maths</label>
		    	</template>

		    	<template v-if="standard == 1 || standard == 2 || standard == 3">
		    		<input id="science" type="checkbox" v-model="subject" value="Science" name="subject-select" class="ml-2">
		    		<label for="science" class="ml-1 mb-0">Science</label>
		    	</template>

		    	<template v-if="standard == 4 || standard == 6 || standard == 11 || standard == 13">
		    		<input id="biology" type="checkbox" v-model="subject" value="Biology" name="subject-select" class="ml-2">
		    		<label for="biology" class="ml-1 mb-0">Biology</label>

		    		<input id="physics" type="checkbox" v-model="subject" value="Physics" name="subject-select" class="ml-2">
		    		<label for="physics" class="ml-1 mb-0">Physics</label>

					<input id="chemistry" type="checkbox" v-model="subject" value="Chemistry" name="subject-select" class="ml-2">
		    		<label for="chemistry" class="ml-1 mb-0">Chemistry</label>

					<input id="computer" type="checkbox" v-model="subject" value="Computer" name="subject-select" class="ml-2">
		    		<label for="computer" class="ml-1 mb-0">Computer</label>
		    	</template>
			</div>
	    </div>

	    <input type="hidden" :value="subject" name="subject">
	</div>
</template>

<script>
	export default {
		props: ['standard', 'select'],
		data() {
			return {
				subject: []
			}
		},
		watch: {
			standard: function () {
				this.subject = [];
			}
		},
		mounted() {
			if (this.subject != '') {
				this.subject = this.select.split(',');
			}
		}
	}
</script>