@props(['name','placeholder', 'values'])
<div x-data @tags-update="" data-tags='[]'>
    <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
      <div class="relative" @keydown.enter.prevent="addTag(textInput)">
        <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
         placeholder="{{ $placeholder }}">
        <div :class="[open ? 'block' : 'hidden']">
          <div class="absolute left-0 z-40 w-full mt-2">
            <div class="py-1 text-sm bg-white border border-gray-300 rounded shadow-lg">
              <a @click.prevent="addTag(textInput)" class="block px-5 py-1 text-gray-700 cursor-pointer hover:bg-indigo-600 hover:text-gray-300">Add tag "<span class="font-semibold" x-text="textInput"></span>"</a>
            </div>
          </div>
        </div>
        <input type="hidden" name="{{ $name }}" x-model="tags">
        <!-- selections -->
        <template x-for="(tag, index) in tags">
          <div class="inline-flex items-center mt-2 mr-1 text-sm text-gray-800 bg-indigo-100 rounded">
            <span class="max-w-xs ml-2 mr-1 text-xs leading-relaxed truncate" x-text="tag"></span>
            <button @click.prevent="removeTag(index)" class="inline-block w-6 h-8 text-gray-500 align-middle hover:text-gray-600 focus:outline-none">
              <svg class="w-6 h-6 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
            </button>
          </div>
        </template>
      </div>
    </div>
  </div>


  <script>
    function tagSelect() {
        return {
            open: false,
            textInput: '',
            tags: [],
            init() {
                this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
                var values = '{{ $values }}';
                // this.tags = values;
                // console.log(values.split(','))
            },
            addTag(tag) {
                tag = tag.trim()
                if (tag != "" && !this.hasTag(tag)) {
                    this.tags.push( tag )
                }
                this.clearSearch()
                this.$refs.textInput.focus()
                this.fireTagsUpdateEvent()
            },
            fireTagsUpdateEvent() {
                this.$el.dispatchEvent(new CustomEvent('tags-update', {
                    detail: { tags: this.tags },
                    bubbles: true,
                }));
            },
            hasTag(tag) {
                var tag = this.tags.find(e => {
                    return e.toLowerCase() === tag.toLowerCase()
                })
                return tag != undefined
            },
            removeTag(index) {
                this.tags.splice(index, 1)
                this.fireTagsUpdateEvent()
            },
            search(q) {
                if ( q.includes(",") ) {
                    q.split(",").forEach(function(val) {
                    this.addTag(val)
                    }, this)
                }
                this.toggleSearch()
            },
            clearSearch() {
                this.textInput = ''
                this.toggleSearch()
            },
            toggleSearch() {
                this.open = this.textInput != ''
            }
        }
    }
  </script>
