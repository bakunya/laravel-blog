<div class="position-fixed top-0 end-0 p-0 p-sm-3" style="z-index: 9999">
    <div id="toast-content-action" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
          <strong class="me-auto title"></strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
            <span class="message"></span>
            <form class="m-0 p-0 mt-3 action" method="POST">
                @csrf
                <input type="hidden" name="_method" value="delete" class="method">
                <input type="hidden" name="id" value="" class="id">
                <button type="submit" class="btn container type title"></button>
            </form>
      </div>
    </div>
</div>