<form 
  action="#" 
  method="POST" 
  class=" d-md-inline-block form-inline mb-3"
>
  <div class="input-group">
    <input 
      id="<?=$searchField;?>"
      class="form-control" 
      name="<?=$searchField;?>"
      type="text" 
      placeholder="Buscar por..." 
      aria-label="Buscar por..."

    />

    <button 
      class="btn btn-primary" 
      type="submit"
    >
      <i class="fas fa-search"></i>
    </button>
  </div>
</form>