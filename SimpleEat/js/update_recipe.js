upload.onchange = evt => {
  const [file] = upload.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}