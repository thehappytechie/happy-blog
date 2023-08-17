<div x-data x-ref="quillEditor" x-init="
quill = new Quill($refs.quillEditor, {theme: 'snow',
modules: {
  toolbar: {
      container: [
          [{ 'size': ['small', false, 'large', 'huge'] }],
          ['bold', 'italic', 'underline'],
          ['blockquote', 'code-block'],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'indent': '-1'}, { 'indent': '+1' }],
          [{ 'align': [] }],
          ['link', 'image','video'],
          ]
  }
}
});
   quill.on('text-change', function () {
        $dispatch('input', quill.root.innerHTML);
    });" wire:model="contents">
    {{ $slot ?? '' }}
</div>
