<template>
    <div :class="`text-${field.textAlign}`">
        <a v-on:click="toggleValue" class="cursor-pointer">
            <boolean-icon :value="field.value" />
        </a>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    data(){
      return {
          objClass: '',
          objValue: '',
          objectId: 0,
      }
    },
    methods:{
        toggleValue(){
            console.log({
                'object': this.objClass,
                'objectId': this.objectId,
                'value': this.objValue,
                'flag': this.field.value ? '0' : '1'
            })
            axios.post('/nova-vendor/boolean-toggle/toggle', {
                'object': this.objClass,
                'objectId': this.objectId,
                'value': this.objValue,
                'flag': this.field.value ? '0' : '1'
            }).then((r) => {
                this.field.value = this.field.value ? false : true
            })
            return false;
        }
    },
    mounted(){
        if(this.$parent.resource.id.value){
            this.objectId = this.$parent.resource.id.value;
        }
        if (this.field.hasOwnProperty('objectClass')) {
            this.objClass = this.field.objectClass;
        }
        if (this.field.hasOwnProperty('objectValue')) {
            this.objValue = this.field.objectValue;
        }
    }
}
</script>
