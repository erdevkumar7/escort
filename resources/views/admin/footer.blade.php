     <!--Re-useable Delete Confirmation Modal -->
     <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Deletion</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     Are you sure you want to delete ?
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <form id="deleteConfirmForm" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>


     {{-- <form id="deleteConfirmForm" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger">Delete</button>
     </form> --}}


     <!-- footer content -->
     <footer>
         <div class="pull-right">
             Admin<a href="#"></a>
         </div>
         <div class="clearfix"></div>
     </footer>
     <!-- /footer content -->
