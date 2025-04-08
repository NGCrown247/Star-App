(function(){const r=document.querySelector(".comment-editor");r&&new Quill(r,{modules:{toolbar:".comment-toolbar"},placeholder:"Product Description",theme:"snow"});const t=`<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`,a=document.querySelector("#dropzone-basic");a&&new Dropzone(a,{previewTemplate:t,parallelUploads:1,maxFilesize:5,acceptedFiles:".jpg,.jpeg,.png,.gif",addRemoveLinks:!0,maxFiles:1});const s=document.querySelector("#ecommerce-product-tags");new Tagify(s);const e=new Date,o=document.querySelector(".product-date");o&&o.flatpickr({monthSelectorType:"static",defaultDate:e})})();$(function(){var r=$(".select2");r.length&&r.each(function(){var e=$(this);e.wrap('<div class="position-relative"></div>').select2({dropdownParent:e.parent(),placeholder:e.data("placeholder")})});var t=$(".form-repeater");if(t.length){var a=2,s=1;t.on("submit",function(e){e.preventDefault()}),t.repeater({show:function(){var e=$(this).find(".form-control, .form-select"),o=$(this).find(".form-label");e.each(function(i){var d="form-repeater-"+a+"-"+s;$(e[i]).attr("id",d),$(o[i]).attr("for",d),s++}),a++,$(this).slideDown(),$(".select2-container").remove(),$(".select2.form-select").select2({placeholder:"Placeholder text"}),$(".select2-container").css("width","100%"),$(".form-repeater:first .form-select").select2({dropdownParent:$(this).parent(),placeholder:"Placeholder text"}),$(".position-relative .select2").each(function(){$(this).select2({dropdownParent:$(this).closest(".position-relative")})})}})}});
