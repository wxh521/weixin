#!/usr/bin/perl -w

use utf8;
use strict;
use warnings;
use Encode;
use LWP::Simple;
use DBI;

my ($sec, $min, $hr, $day, $mon, $year) = localtime;
printf("%04d-%02d-%02d %02d:%02d:%02d\n", $year+1900, $mon+1, $day, $hr, $min, $sec);
print "Begin Connect\n";

my $dsn = 'dbi:mysql:dbname=hdm1150141_db;host=hdm-115.hichina.com;port=3306';
my $dbh = DBI->connect($dsn, 'hdm1150141', '19820819',{mysql_enable_utf8=>1, RaiseError=>1, PrintError=>1, AutoCommit=>1});
$dbh->{mysql_auto_reconnect} = 1;

#my $sth = $dbh->prepare("INSERT INTO data_struct_attribute (name, description, struct_id) VALUES (?, ?, ?)");
#    my $isSuccess = $sth->execute(@site);

for my $i (1..33) {
    my @zhongyao = ();
    my $url = 'http://www.zhongyoo.com/name/page_'.$i.'.html';
    my $content = get($url);
    if ($content =~ /<div[^>]*?class="gaishu"[^>]*?>(.*?)<div[^>]*?id="special1"[^>]*?style="display:none;"[^>]*?>/is) {
    	$content = $1;
    }
    
    if ($content =~ /<strong>中药名<\/strong>】(.*?)<\/p>/is) {
    	
    }
    
}

($sec, $min, $hr, $day, $mon, $year) = localtime;
printf("%04d-%02d-%02d %02d:%02d:%02d\n", $year+1900, $mon+1, $day, $hr, $min, $sec);

sub getGMT {
    my $date = shift;
    my ( $sec, $min, $hour, $mday, $mon, $year, $wday, $yday, $isdst ) = gmtime($date);
    $mon = $mon+1;;
    $year = $year+1900;
    my $dt = DateTime->new('year'=>$year, 'month'=>$mon, 'day'=>$mday, 'hour'=>$hour, 'minute'=>$min, 'second'=>$sec, 'time_zone'=>'Asia/Shanghai');
    return $dt;
}









1;