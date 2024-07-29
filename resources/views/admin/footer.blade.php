     <!-- Re-useable Delete Confirm Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <p class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete</p>
                     <button type="button" class="fa fa-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <h5> Are you sure you want to delete ?</h5>
                 </div>
                 <div class="modal-footer">
                     <form id="deleteConfirmForm" method="POST" style="display:inline">
                         @csrf
                         @method('DELETE')
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- footer content -->
     <footer>
         <div class="pull-right">
             Admin<a href="#"></a>
         </div>
         <div class="clearfix"></div>
     </footer>
     <!-- /footer content -->
