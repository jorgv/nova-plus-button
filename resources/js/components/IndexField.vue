<template>
    <span>
        <button
        @click="increaseResource"
        class="cursor-pointer text-70 hover:text-primary mr-3"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" aria-labelledby="updateRequest" role="presentation" class="fill-current">
            <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"/></svg>
        </button>
        <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">{{field.value}}</span>
        <button
        @click="decreaseResource"
        class="cursor-pointer text-70 hover:text-primary mr-3" v-show="field.decrease"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" aria-labelledby="updateRequest" role="presentation" class="fill-current">
            <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm4-8a1 1 0 0 1-1 1H9a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1z"/></svg>
        </button>        
    </span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    methods: {
        /**
         * Send an update request to increase value for this resource
         */
        increaseResource() {
            this.field.value += this.field.increaseValue;          
            return Nova.request().post(
                `/api/${this.resourceName}/increase/${this.$parent.resource.id.value}`,
                {
                    count: this.field.value
                }
            ).then((response) => {
                this.$emit('actionExecuted')
                this.$toasted.show(this.__('The action ran successfully!'), { type: 'success' })
            });
        },
        /**
         * Send an update request to decrease value for this resource
         */
        decreaseResource() {
            this.field.value -= this.field.increaseValue;          
            return Nova.request().post(
                `/api/${this.resourceName}/decrease/${this.$parent.resource.id.value}`,
                {
                    count: this.field.value
                }
            ).then((response) => {
                this.$emit('actionExecuted')
                this.$toasted.show(this.__('The action ran successfully!'), { type: 'success' })
            });
        },        
    }
}
</script>
