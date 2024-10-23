

<div class="accordion custome-accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span>Categories</span>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <div class="form-floating theme-form-floating-2 search-box">
                    <input type="search" class="form-control" id="search" placeholder="Search ..">
                    <label for="search">Search</label>
                </div>

                <ul class="category-list custom-padding custom-height">
                     @foreach (product_categories() as $item )
                        <li>
                            <div class="form-check ps-0 m-0 category-list-box">
                                <input class="checkbox_animated" type="checkbox" id="fruit">
                                <label class="form-check-label" for="fruit">
                                    <span class="name">{{$item->name}}</span>
                                    <span class="number">({{total_category_product($item->id)}})</span>
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- <div class="filter-category">
    <div class="filter-title">
        <h2>Filters</h2>
        <a href="javascript:void(0)">Clear All</a>
    </div>
    <ul>
        <li>
            <a href="javascript:void(0)">Vegetable</a>
        </li>
        <li>
            <a href="javascript:void(0)">Fruit</a>
        </li>
        <li>
            <a href="javascript:void(0)">Fresh</a>
        </li>
        <li>
            <a href="javascript:void(0)">Milk</a>
        </li>
        <li>
            <a href="javascript:void(0)">Meat</a>
        </li>
    </ul>
</div> --}}
