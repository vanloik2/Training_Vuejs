<template>
<div v-if="isModal" class="modal-post card">
    <div class="card-header">
        <h2>Create post</h2>
        <i @click="$emit('closeModal')" class="bi bi-x-lg"></i>
    </div>
    <div class="card-body">
        <div class="user-wp d-flex align-items-center">
            <p><img src="./../../assets/images/logo_default.png" alt=""></p>
            <div>
                <h5>Lợi Liễu</h5>
                <span>Public</span>
            </div>
        </div>
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="card-footer">
        <button>Post</button>
    </div>
</div>
</template>

<script>
export default {
    setup(props, emits) {
        const isModal = props.isModal;

        const abc = (() => {
            emits.closeModal()
        })

        return {isModal, abc}
        
    },
    props: {
        isModal: Boolean,
    },
    emits: {
        closeModal:Function
    }
  
}
</script>

<style scoped>
.hide-modal {
    display: none !important;
}

.modal-post {
    width: 500px;
    top: 300px;
    left: 37%;
    background-color: #242526;
    color: #e0e0e0;
    position: fixed;
    z-index: 1000;
}

.card-header {
    text-align: center;
    border-bottom-color: #3a3b3c;
}

.card-header i {
    cursor: pointer;
    position: absolute;
    top: 8px;
    color: #fff;
    right: 10px;
    background-color: #3a3b3c;
    padding: 5px 9px;
    border-radius: 100%;
}

.card-header i:hover {
    background-color: #555454;
}

.card-header h2 {
    font-size: 20px;
    font-weight: bold;
}

.user-wp img {
    border-radius: 100%;
    margin-right: 10px;
}

.user-wp h5 {
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 0;
}

.user-wp span {
    font-size: 12px;
    font-weight: bold;
    background-color: #3a3b3c;
    padding: 2px 5px;
    border-radius: 10px;
}

textarea {
    width: 100%;
    outline: none;
    border: none;
    color: #e0e0e0;
    font-size: 24px;
    margin-top: 10px;
    height: 75px;
    background-color: #242526;
    overflow: hidden;
}

.card-footer {
    border-top: none;

}

.card-footer button {
    outline: none;
    border: none;
    background-color: #2374e1;
    width: 100%;
    height: 36px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: bold;
    color: #e0e0e0;
    margin: 5px 0px;
}
</style>
