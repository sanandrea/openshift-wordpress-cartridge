#!/usr/bin/perl
use strict;
use warnings;

open my $fh, '<', '/var/www/html/scripts/ec2-user_data.txt' or die "Unable to open file:$!\n";
my %hash = map { split /=|\s+/; } <$fh>;
close $fh;


$^I = '.bak'; # create a backup copy 

my $re = join '|', map quotemeta, keys %hash;

while ( <> ) {
    s/\b($re)\b/$hash{$1}/g;
    print;
}
