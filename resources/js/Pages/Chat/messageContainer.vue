<template>
    <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
            <div v-for="(message, index) in messages" :key="index">
                <message :message = "message" />
            </div>
        </div>
    </div>
</template>

<script>
import message from './message.vue'

export default{
  components: { message },
  props: ['messages']
}
</script>