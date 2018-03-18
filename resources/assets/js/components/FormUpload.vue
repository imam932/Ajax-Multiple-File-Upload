<template>
    <form @submit.prevent="handleSubmit">
               
                <div class="form-group">
                  <file-input v-on:file-change="setFiles"></file-input>
                </div>
                <div class="form-group">
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </form>
</template>

<script>
    // import FileInput from './FileInput.vue'

    export default{
        methods: {
            handleSubmit () {
                alert(this.files.name);
            },
            setFiles (files) { //dari input
                if(files != undifind){
                    this.files = files
                }
            }
        },
        components: {
            FileInput
        },
        data () {
            return {
                files: ''
            }
        }

    }
</script>