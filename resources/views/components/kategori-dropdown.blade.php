<div class="kategori-dropdown-wrapper" style="position: relative; margin-left: 1.5rem;">
    <div class="kategori-toggle" onclick="document.querySelector('.kategori-dropdown').classList.toggle('show')"
         style="font-weight: 600; font-size: 0.95rem; color: #374151; cursor: pointer;">
        Kategori <span style="font-size: 0.75rem;">▼</span>
    </div>
    <div class="kategori-dropdown"
     style="display: none; position: absolute; top: 100%; left: 0; background: white;
            border: 1px solid #ddd; padding: 1rem; width: 260px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); z-index: 999;
            max-height: 300px; overflow-y: auto;">
        @foreach ($categories as $kategori)
            <div style="margin-bottom: 0.75rem;">
                <p style="font-weight: bold; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem; color: #1F2937;">
                    <i class="fas {{ $categoryIcons[$kategori->name] ?? 'fa-tag' }}"></i>
                    {{ $kategori->name }}
                </p>
                @if ($kategori->subcategories->count())
                    <ul style="margin-left: 1.5rem; margin-top: 0.25rem; font-size: 0.8rem; color: #4B5563; list-style: disc;">
                        @foreach ($kategori->subcategories as $sub)
                            <li>
                                <a href="{{ url('/kategori/' . $sub->slug) }}" style="text-decoration: none; color: inherit;"
                                   onmouseover="this.style.color='#4F9D4D'" onmouseout="this.style.color='inherit'">
                                    {{ $sub->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul>
                        @for ($i = 1; $i <= 10; $i++)
                            <li style="color: #9CA3AF;">Subkategori {{ $i }}</li>
                        @endfor
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
</div>
