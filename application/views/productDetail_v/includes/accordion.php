<br><hr><br>
        <div id="accordion">
         <div class="card">
          <div class="card-header" id="headingOne">
           <h5 class="mb-0">
            <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
             Kullanıcı Sözleşmesi
           </button>
         </h5>
       </div>

       <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
         <div class="card-body">
          <?php echo $page->user_agreement; ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
       <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Kullanım Koşulları
       </button>
     </h5>
   </div>
   <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
     <div class="card-body">
      <?php echo $page->terms_of_use; ?>
    </div>
  </div>
</div>   
</div>