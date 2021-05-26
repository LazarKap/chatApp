<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <message-container />
                        <input-message :room="curentRoom" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MessageContainer from './messageContainer.vue'
    import InputMessage from './messageInput.vue'

    export default {
        components: {
            AppLayout,
            MessageContainer,
            InputMessage
        },
        data: function(){
            return {
                chatRooms: [],
                curentRoom: [],
                messages: []
            }
        },
        methods: {
            getRooms(){
                axios.get('/chat/rooms')
                .then(respone => {
                    this.chatRooms = response.data;
                    this.setRoom = response.data[0];
                })
                .catch(error =>{
                    console.log(error);
                })
            },
            setRoom(room){
                this.curentRoom = room;
                this.getMessages();
            },
            getMessages(){
                axios.get('/chat/room/' + this.curentRoom.id + '/messages')
                .then( response => {
                    this.messages = response.data;
                })
                .catch(error =>{
                    console.log(error);
                })
            }

        },
        created(){
            this.getRooms();
        }

    }
</script>