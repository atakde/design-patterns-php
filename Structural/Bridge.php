<?php

interface ReportFormatInterface
{
    public function create();
}

class WebFormat implements ReportFormatInterface
{
    public function create()
    {
        echo "Created report in web format.";
    }
}

class MobileFormat implements ReportFormatInterface
{
    public function create()
    {
        echo "Created report in mobile format.";
    }
}

abstract class Report
{
    public function __construct(private ReportFormatInterface $format)
    {
    }

    public function display()
    {
        echo $this->format->create();
    }
}

class SalesReport extends Report
{
    public function __construct(private ReportFormatInterface $format)
    {
    }

    public function display()
    {
        echo "--- Sales Report ---" . PHP_EOL;
        echo $this->format->create();
    }
}

class PerformanceReport extends Report
{
    public function __construct(private ReportFormatInterface $format)
    {
    }

    public function display()
    {
        echo "--- Performance Report ---" . PHP_EOL;
        echo $this->format->create();
    }
}

$salesReport = new SalesReport(new MobileFormat);
$salesReport->display();
