<?php

interface ImageInterface
{
    public function display();
}

class Image implements ImageInterface
{
    public function __construct(
        private string $imageName
    ) {
        $this->loadImage();
    }

    private function loadImage()
    {
        echo "Loading image " . $this->imageName . PHP_EOL;
    }

    public function display()
    {
        echo "Display " . $this->imageName . PHP_EOL;
    }
}

class ProxyImage implements ImageInterface
{
    private $image;

    public function __construct(
        private string $imageName
    ) {
    }

    public function display()
    {
        if (!$this->image) {
            $this->image = new Image($this->imageName);
        }

        $this->image->display();
    }
}

// Just one time loading the image in this example.
$proxyImage = new ProxyImage("image.png");
$proxyImage->display();
$proxyImage->display();
