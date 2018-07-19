<template lang="html">
    <div>
        <input type="file" id="profile_picture" ref="file" class="d-none" @change="handleFileUpload" accept="image/*">
    </div>
</template>

<script>
    export default {
        props: ['model', 'id'],
        methods: {
            handleFileUpload: function(event) {
                this.$emit('uploading', true);
                document.querySelector('img.shadow-sm').classList.remove('border');
                document.querySelector('img.shadow-sm').classList.remove('border-danger');

                let data = new FormData();
                data.append('picture', this.$refs.file.files[0]);
                data.append('model', '\\App\\' + this.model);
                data.append('id', this.id);

                axios.post('/admin/update/profile_picture', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: (progressEvent) => {
                        this.$emit('progress', [
                            progressEvent.loaded, progressEvent.total
                        ]);
                    }
                })
                .then((response) => {
                    this.$emit('uploaded', response.data);
                    this.$emit('uploading', false);
                })
                .catch((error) => {
                    document.querySelector('img.shadow-sm').classList.add('border');
                    document.querySelector('img.shadow-sm').classList.add('border-danger');
                    this.$emit('uploading', false);
                });
            },
        }
    }
</script>
