<?php


namespace App\Utils;



use Illuminate\Contracts\Pagination\Paginator;

class ApiResponseBuilder
{
    private $status;

    private $data;

    private $message;

    private $page;

    private $per_page;

    private $total;


    /**
     * @param mixed $status
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    /*
     * @param int $totam
     */
    /**
     * @param mixed $total
     */
    public function setTotal($total): self
    {
        $this->total = $total;
        return $this;
    }

    public function setPaggination(Paginator $paginator): self
    {
        $this->data = collect($paginator->items())->toArray();
        $this->status = true;
        $this->per_page = $paginator->perPage();
        $this->page = $paginator->currentPage();
        $this->total =  $paginator->total();
        return $this;
    }

    public function build (): ApiResponse
    {
        $response = new ApiResponse();
        $response->message = $this->message;
        $response->data = $this->data;
        $response->status = $this->status;
        $response->page =  $this->page;
        $response->per_page =  $this->per_page;
        $response->total =  $this->total;
        return $response;
    }
}
