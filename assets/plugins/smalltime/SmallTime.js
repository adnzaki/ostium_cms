/*
 * Indonesia Date and Time format library
 * A simple and rewriteable JavaScript library
 * Written by Adnan Zaki
 * Since September 2016 until 31 Oktober 2016
 * Current version: 0.2.1 (Development version, want to use? Do with your own risk)
 */

function SmallTime() {"use strict"}

/*********************************
 * Global variables declaration  *
 *********************************/
var init    = new Date();
var day     = init.getDay(),
    date    = init.getDate(),
    month   = init.getMonth(),
    year    = init.getFullYear(),
    months  = [ "Januari",  "Februari",     "Maret",
                "April",    "Mei",          "Juni",
                "Juli",     "Agustus",      "September",
                "Oktober",  "November",     "Desember" ],
    mon_num = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    days    = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

if ( date < 10 ) {
    date = "0" + date;
}

/*********************************
 * Setup global methods          *
 *********************************/
function getToday() {
    return days[day];
}

function thisMonth() {
    return months[month];
}

function numOfMonth() {
    return mon_num[month]
}

/************************************************
 * This is a built-in selector used by .clock() *
 ************************************************/
function selector(elem, content) {
    var type    = elem.charAt(0),
        id      = elem.substr(1);
    if ( type === "#" ) {
        document.getElementById(id).innerHTML = content;
    }
    else if ( type === "." ) {
        var classes = document.getElementsByClassName(id);
        classes[0].innerHTML = content;
    }
    else {
        return false;
    }
}

var error = {
    invalid_argument: "Argumen yang anda masukkan tidak valid",
    args_required: "Minimal satu argumen diperlukan!",
    invalid_separator: "Pemisah tanggal tidak valid",
    invalid_date: "Format tanggal tidak valid",
    date_required: "Format tanggal diperlukan untuk menjalankan fungsi ini"
};

SmallTime.prototype = {
    fullDate: function( separator, callback ) {
        separator   = separator || " ";
        var today   = callback  || "";
        var fullDay;

        if (today === "")     {
            fullDay = date + separator + thisMonth() + separator + year;
        }
        else     {
            fullDay = today + ", " + date + separator + thisMonth() + separator + year;
        }
        return fullDay;
    },
    shortDate: function( separator, callback ) {
        var mon     = numOfMonth(),
            short,
            today   = callback  || "";
        separator   = separator || "/";

        if ( mon < 10 ) {
            mon = "0" + mon;
        }

        if ( today === "" ) {
            short = date + separator + mon + separator + year;
        }
        else {
            short = today + ", " + date + separator + mon + separator + year;
        }
        return short;
    },
    clock: function( element, secs, separator, callback ) {
        setInterval(function() {
            var time    = new Date();
            var hour    = time.getHours(),
                min     = time.getMinutes(),
                sec     = time.getSeconds(),
                today, clock;

            if ( hour < 10 ) {
                hour = "0" + hour;
            }
            if ( min < 10 ) {
                min = "0" + min;
            }
            if ( sec < 10 ) {
                sec = "0" + sec;
            }

            separator   = separator || ":";
            today       = callback  || "";
            if ( secs === true ) {
                clock = today + " " + hour + separator + min + separator + sec;
            }
            else {
                clock = today + " " + hour + separator + min;
            }
            selector( element, clock );
        }, 1000);
    },
    format: function( pattern, callback ) {
        var dateFormat, monthFormat,
            yearFormat, getMonth, getYear,
            getFormat;
        if ( arguments.length === 0 ) {
            return error.date_required;
        }
        else if ( arguments.length >= 1 ) {
            var separator   = [],
                today       = callback || "";
            separator[0]    = pattern.substr(2, 1);
            separator[1]    = pattern.substr(5, 1);
            dateFormat      = pattern.substr(0, 2);
            monthFormat     = pattern.substr(3, 2);
            yearFormat      = pattern.substr(6, 2);


            if ( dateFormat !== 'dd' ) {
                return error.invalid_date;
            }
            if ( monthFormat === 'mm' ) {
                getMonth = numOfMonth();
                if (getMonth < 10) {
                    getMonth = "0" + numOfMonth();
                }
            }
            else if ( monthFormat === 'Mm' ) {
                getMonth = thisMonth();
                getMonth = getMonth.substr(0, 3);
            }
            else if ( monthFormat === 'MM' ) {
                getMonth = thisMonth();
            }
            else {
                return error.invalid_date;
            }

            if ( yearFormat === 'yy' ) {
                getYear = year.toString();
                getYear = getYear.substr(2, 2);
            }
            else if ( yearFormat === 'YY' ) {
                getYear = year;
            }
            else {
                return error.invalid_date;
            }
            if ( today === "" ) {
                getFormat = date + separator[0] + getMonth + separator[1] + getYear;
            }
            else {
                getFormat = today + ", " + date + separator[0] + getMonth + separator[1] + getYear;
            }
            return getFormat;
        }
    }
};

function getTimestamp( date ) {
    date = date.split("-");
    var times = new Date(date[2] + ',' + date[1] + ',' + date[0]).getTime();
    return times;
}

function hari( arg ) {
    var theDay;
    switch(arg) {
        case 'Sun': theDay = days[0]; break;
        case 'Mon': theDay = days[1]; break;
        case 'Tue': theDay = days[2]; break;
        case 'Wed': theDay = days[3]; break;
        case 'Thu': theDay = days[4]; break;
        case 'Fri': theDay = days[5]; break;
        case 'Sat': theDay = days[6]; break;
    }
    return theDay;
}

function bulan( arg ) {
    var theMonth;
    switch(arg) {
        case 'Jan': theMonth = months[0]; break;
        case 'Feb': theMonth = months[1]; break;
        case 'Mar': theMonth = months[2]; break;
        case 'Apr': theMonth = months[3]; break;
        case 'May': theMonth = months[4]; break;
        case 'Jun': theMonth = months[5]; break;
        case 'Jul': theMonth = months[6]; break;
        case 'Aug': theMonth = months[7]; break;
        case 'Sep': theMonth = months[8]; break;
        case 'Oct': theMonth = months[9]; break;
        case 'Nov': theMonth = months[10]; break;
        case 'Dec': theMonth = months[11]; break;
    }
    return theMonth;
}

function getDateResult( arg ) {
    var result      = new Date(arg).toString();
    var sliceResult = result.substr(0, 15);
    var to          = sliceResult.split(" ");
    var nextDay     = to[0],
        nextMonth   = to[1],
        date        = to[2],
        year        = to[3];
    return this.hari( nextDay ) + ", " + date + " " + bulan( nextMonth ) + " " + year;
}

SmallTime.prototype.dateAdd = function( day, from ) {
    var timestamp;
    if( arguments.length === 1 ) {
        timestamp = init.getTime();
    }
    else if( arguments.length === 2 ) {
        timestamp = getTimestamp( from );
    }
    else if( arguments.length < 1 ) {
        return error.args_required;
    }
    else {
        return error.invalid_argument;
    }

    var diff    = day * (1000 * 60 * 60 * 24);
    var time    = timestamp + diff;
    return getDateResult(time);
};

SmallTime.prototype.dateSub = function( day, from ) {
    var timestamp;
    if( arguments.length === 1 ) {
        timestamp = init.getTime();
    }
    else if( arguments.length === 2 ) {
        timestamp = getTimestamp( from );
    }
    else if( arguments.length < 1 ) {
        return error.args_required;
    }
    else {
        return error.invalid_argument;
    }

    var diff        = day * (1000 * 60 * 60 * 24);
    var time        = timestamp - diff;
    return getDateResult(time);
};

function checkMonth( bulan ) {
    var jml_hari;
    if(bulan === 1 || bulan === 3 || bulan === 5 ||
    bulan === 7 || bulan === 8 || bulan === 10 || bulan === 12) {
        jml_hari = 31;
    }
    else if(bulan === 4 || bulan === 6 || bulan === 9 || bulan === 11) {
        jml_hari = 30;
    }
    else if(bulan === 2) {
        if( cekKabisat() ) {
            jml_hari = 29;
        }
        else {
            jml_hari = 28;
        }
    }
    else {
        return "Invalid Month";
    }
    return jml_hari;
}

function countDay( month = [] ) {
    var i = 0,
        total = 0;
    while(i < month.length) {
        var days = checkMonth(month[i]);
        total += days;
        i++;
    }
    return total;
}

function cekKabisat() {
    if(year % 4 === 0) {
        return true;
    }
    else {
        return false;
    }
}

SmallTime.prototype.dateDiff = function( from, to )
{

    // If the second parameter takes 'now' as argument
    if(to === 'now') {
        // Use .format() to convert 'now' into valid date in SmallTime
        to = this.format('dd-mm-YY');
    }

    // Convert date into timestamp
    var timeFrom    = getTimestamp(from),
        timeTo      = getTimestamp(to);

    // Convert date into array object
    // Take the [1] index of array to get the month
    // and [2] index as year
    var get_date_from   = from.split("-");
    var month_from      = get_date_from[1],
        year_from       = get_date_from[2];

    var get_date_to     = to.split("-");
    var month_to        = get_date_to[1],
        year_to         = get_date_to[2];

    // The month is currently a string, we need to parse it into number
    // So it will be count-able to be argument in .checkMonth()
    month_from          = parseInt(month_from);
    var daysOfMonth     = checkMonth(month_from);

    // Count the difference of the timestamp and return the total of days
    var diff;
    timeTo > timeFrom ? diff = timeTo - timeFrom : diff = timeFrom - timeTo;
    diff = diff / (1000 * 60 * 60 * 24);
    var totalHari = Math.floor(diff);

    if(totalHari < daysOfMonth) {
        return totalHari + " hari";
    } else {
        var month_diff;

        // Count the difference of months
        if(month_from > month_to) {
            month_diff = month_from - month_to;
            month_to -= 1;
        } else {
            month_diff = month_to - month_from;
            month_from -= 1;
        }

        var insertMonth = [];
        for(var i = 0; i < month_diff; i++) {
            if(month_from > month_to) {
                month_to++;
                insertMonth.push(month_to);
            } else {
                month_from++;
                insertMonth.push(month_from);
            }
        }
        var day_diff = totalHari - countDay(insertMonth);

        // If there's no difference between the days,
        // then give message to user that this is the same dates,
        // otherwise, it will return the difference between dates
        if(totalHari === 0) {
            return "Tidak ada selisih";
        } else {
            if(day_diff === 0) {
                return month_diff + " bulan" + " (Total: " + totalHari + " hari)";
            } else {
                return month_diff + " bulan " + day_diff + " hari " + "(Total: " + totalHari + " hari)";
            }
        }
    }
    //return year_from + " " + year_to;
};

// Bagaimana jika beda tahun??
