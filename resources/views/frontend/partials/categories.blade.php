     <ul id="topMain" class="nav nav-pills nav-main">
                     
        @forelse($categories as $category)
            <li class="dropdown">                    
                <a class="dropdown-toggle" href="#!" style="font-size: 13px;padding-left: 0 ">
                  <i class="{{ $category->icono }}"></i>  {{ $category->name }}
                </a>
                @if($category->subcategories->count()>0)
                <ul class="dropdown-menu">
                    @foreach($category->subcategories as $sub)
                        @php
                          if(count($country->country)>0)
                          {
                              $subcat = DB::table('bussines')
                                               ->join('municipalities','municipalities.id','=','bussines.municipality_id')
                                               ->join('cities','cities.id','=','municipalities.city_id')
                                               ->join('countries','countries.id','=','cities.country_id')
                                               ->join('sub_categories','sub_categories.id','=','bussines.subcategory_id')
                                               ->join('pictures','pictures.bussine_id','=','bussines.id')
                                               ->where('sub_categories.id',$sub->id)
                                               ->where('cities.name','=',$country->name)
                                               ->count();

                          }elseif(count($country->city)){

                              $subcat = DB::table('bussines')
                                               ->join('municipalities','municipalities.id','=','bussines.municipality_id')
                                               ->join('cities','cities.id','=','municipalities.city_id')
                                               ->join('countries','countries.id','=','cities.country_id')
                                               ->join('sub_categories','sub_categories.id','=','bussines.subcategory_id')
                                               ->join('pictures','pictures.bussine_id','=','bussines.id')
                                               ->where('sub_categories.id',$sub->id)
                                               ->where('municipalities.name','=',$country->name)
                                               ->count();

                          }else{

                              $subcat = DB::table('bussines')
                                               ->join('municipalities','municipalities.id','=','bussines.municipality_id')
                                               ->join('cities','cities.id','=','municipalities.city_id')
                                               ->join('countries','countries.id','=','cities.country_id')
                                               ->join('sub_categories','sub_categories.id','=','bussines.subcategory_id')
                                               ->join('pictures','pictures.bussine_id','=','bussines.id')
                                               ->where('sub_categories.id',$sub->id)
                                               ->where('countries.name','=',$country->name)
                                               ->count();

                          }

                        
                        @endphp
                          
                           @if($subcat!=0)
                                 <li class="dropdown {{ route('front.categorycountry',[$country->slug,$sub->slug])==Request()->url() ? 'active' : '' }}" >
                                    <a href="{{ route('front.categorycountry',[$country->slug,$sub->slug]) }}" style="font-size: 11.5px;">
                                    <i class="{{ $sub->icono }}" ></i> 
                                    {{ $sub->name }} 
                                    </a>
                                </li>
                                <li class="divider"></li>
                           @endif
                        
                    @endforeach
             </ul>
             @endif
        </li>
         @empty
        @endforelse
</ul>


                       
