@php

    $timestamp = strtotime('18th December 2016'); //1072915200

// this prints the year in a two digit format
// however, as this would start with a "0", it
// only prints "4"
echo idate('w', $timestamp);
@endphp