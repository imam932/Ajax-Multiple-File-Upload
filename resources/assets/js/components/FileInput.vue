<template>
    <div>
        <div class="input-group">
            <input type="text" :value="files.name" readonly class="form-control">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default" @click="showFilePicker">
                    <i class="glyphicon glyphicon-paperclip"></i>
                </button>
            </span>
        </div>
        <input type="file" ref="file" style="display:none;" @change="onChange">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                files: ''
            }
        },
        methods: {
            showFilePicker() {
                this.$ref.file.click();
            },
            onChange (event) {
                this.files = event.target.files[0]
                this.$emit('file-change', this.files)
            }
        }
    }    
</script>