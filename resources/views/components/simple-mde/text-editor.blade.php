<div wire:ignore class="mt-4">
    <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">Contents</label>
    <div class="mt-2" x-data="{ contents : @entangle('contents').defer }" x-init='
                $nextTick(() => {
                let editor = new SimpleMDE({
                    element: $refs.editor,
                    promptURLs: true,
                    hideIcons: ["side-by-side", "fullscreen","horizontal-rule"],
                    showIcons: ["code", "table"],
                    renderingConfig: {
                        singleLineBreaks: false,
                        codeSyntaxHighlighting: true,
                    },
                    initialValue: contents
                 });
                 editor.codemirror.on("change", function(){
                    contents = editor.value()
                })
             })'>
        <textarea x-ref="editor" wire:model="contents"></textarea>
    </div>
</div>
