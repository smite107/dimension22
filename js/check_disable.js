function checkDisable() {
  $btnUpload = $('div.add_photo button.upload');
  if ($btnUpload.length) {
    $parent = $btnUpload.parents('.add_photo');
    $data = JSON.parse($btnUpload.siblings('input').val());
    if ($parent.siblings('div.preview').length >= $data.count) {
       $parent.hide();
    } else {
       $parent.show();
    }
  }
}