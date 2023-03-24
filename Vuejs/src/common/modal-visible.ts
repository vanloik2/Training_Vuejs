import { defineStore } from "pinia";

export const modalVisible = defineStore("modal-visible", {
    actions: {
        async actionModal(showModal :boolean) {
            console.log('after', showModal);
            
            return showModal = !showModal
        }
    }
})