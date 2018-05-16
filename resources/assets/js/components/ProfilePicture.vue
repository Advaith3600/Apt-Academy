<template>
    <div>
        <input type="file" id="profile_picture" ref="file" class="d-none" v-on:change="handleFileUpload" accept="image/*">
    </div>
</template>

<script>
    export default {
        methods: {
            handleFileUpload: function(event) {
                document.querySelector('img.shadow-sm').classList.remove('border');
                document.querySelector('img.shadow-sm').classList.remove('border-danger');

                let vm = this;
                let data = new FormData();
                data.append('picture', this.$refs.file.files[0]);

                axios.post('/profile/password/update/picture', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    vm.$emit('uploaded', response.data);
                })
                .catch(function(error) {
                    document.querySelector('img.shadow-sm').classList.add('border');
                    document.querySelector('img.shadow-sm').classList.add('border-danger');
                });
            },
        }
    }
</script>
