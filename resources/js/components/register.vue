<template>


    <!-- Modal -->
    <div id="registerModal" aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" role="dialog"
         tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Modal title</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            modalShow: false,
            Name: 'Hadi Niazi',
        }
    }
}
</script>

