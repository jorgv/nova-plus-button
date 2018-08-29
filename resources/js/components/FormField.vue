<template>
    <default-field :field="field">
        <template slot="field">
            <input :id="field.name" type="text"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
                disabled
            />

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
            <button
            @click="increase"
            class="cursor-pointer text-70 hover:text-primary mr-3"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" aria-labelledby="updateRequest" role="presentation" class="fill-current">
                <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"/></svg>
            </button>
            <button
            @click="decrease"
            class="cursor-pointer text-70 hover:text-primary mr-3" v-show="field.decrease"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" aria-labelledby="updateRequest" role="presentation" class="fill-current">
                <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm4-8a1 1 0 0 1-1 1H9a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1z"/></svg>
            </button>   
        </template>  
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
          this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
          formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value
        },
        /**
         * Send an update request to increase value for this resource
         */
        increase() {
            value += this.field.increaseValue;          
        },
        /**
         * Send an update request to decrease value for this resource
         */
        decrease() {
            value -= this.field.increaseValue;          
        },        
    }
}
</script>
