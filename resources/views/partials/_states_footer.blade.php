@php
$states = \App\Models\StatePromotions::select('name', 'slug')->where('published', STATUS_ACTIVE)->orderBy('name')->get();
@endphp
<section class="stateSect sec-padding {{isset($blueBackground) ? "bg-secondary" : ""}}">
    <div class="container">
        <div class="stateSectHead">
            <span class="page-heading">
                <h4 class="title mbpx-20">
                    State Guides
                </h4>
            </span>
            <p class="desc ta-center">
                OSHA Outreach Courses makes it simple to take and pass your course.
            </p>
        </div>
        <div class="stateList">
            <ul>
                @foreach($states as $state)
                <li><a href="/states-requirements/{{$state->slug}}">{{ $state->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<style>
/* Section State Guides styling */

section.stateSect .stateSectHead {
    margin-bottom: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid #ddd;
}

section.stateSect .stateSectHead h4 {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 30px;
    line-height: 1.2;
    letter-spacing: 5px;
    text-transform: uppercase;
}

section.stateSect .stateList ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
}

section.stateSect .stateList ul li {
    width: 16.666%;
}

section.stateSect .stateList ul li a {
    font-size: 12px;
    display: block;
    margin-bottom: 10px;
    color: #1c1c1c;
    font-weight: 600;
    text-transform: uppercase;
}

@media screen and (max-width:991px) {
    section.stateSect .stateList ul li {
        width: 25%;
    }
}
@media screen and (max-width:767px) {
    section.stateSect .stateList ul li {
        width: 33%;
    }
}
@media screen and (max-width:500px) {
    section.stateSect .stateList ul li {
        width: 50%;
    }
    section.stateSect .stateList {
        padding: 0 30px;
    }
}
@media screen and (max-width:300px) {
    section.stateSect .stateList ul li {
        width: 100%;
    }
}

/* Section State Guides styling */
</style>
