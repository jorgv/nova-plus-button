<template>
    <span>
        <button
        @click="Increase"
        class="cursor-pointer text-70 hover:text-primary mr-3"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="updateRequest" role="presentation" class="fill-current">
            <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"/></svg>
            <span>{{field.value}}</span>
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
        Increase() {
            this.field.value = this.field.value + this.field.increaseValue;          
            return Nova.request().post(
                `/api/${this.resourceName}/increase/${this.$parent.resource.id.value}`,
                {
                    count: this.field.value
                }
                )  
        },
    }
}
</script>
