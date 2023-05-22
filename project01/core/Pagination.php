<?php

namespace Core;

trait Pagination
{
    private $maxPage = null;

    public function getData($sql, $limit)
    {

        //$offset = ($page - 1) * $limit;
        //select * from users limit $limit offset $offset

        $maxPage = ceil($this->count($sql) / $limit);

        $this->maxPage = $maxPage;

        $currentPage = $this->getPage();

        $offset = ($currentPage - 1) * $limit;

        $sql = $this->createSql($sql, $limit, $offset);

        return [
            'data' => $this->get($sql),
            'paginate' => [
                'maxPage' => $this->maxPage,
                'currentPage' => $currentPage
            ]
        ];
    }


    public function links($data, $isParams = false)
    {


        if (!empty($data['paginate'])) {
            $paginate = $data['paginate'];
            extract($paginate); //destructuring

            $query = $isParams ? $this->getQueryString() : null;

            $pageItem = '';

            if ($currentPage > 1) {
                $prevPage = $currentPage - 1;
                $pageItem .= '<li class="page-item">
                <a class="page-link" href="?page='.$prevPage.$query.'" aria-label="Previous">
                    <span aria-hidden="true">Trước</span>
                    </a>
                </li>';
            }

            for ($page = 1; $page <= $maxPage; $page++) {
                $active = $page == $currentPage ? ' active' : '';
                $pageItem .= '
                <li class="page-item'.$active.'">
                    <a class="page-link" href="?page='.$page.$query.'" aria-label="Previous">
                        <span aria-hidden="true">'.$page.'</span>
                    </a>
                </li>';
            }

            if ($currentPage < $maxPage) {
                $nextPage = $currentPage + 1;
                $pageItem .= '<li class="page-item">
                <a class="page-link" href="?page='.$nextPage.$query.'" aria-label="Previous">
                    <span aria-hidden="true">Sau</span>
                    </a>
                </li>';
            }


            $html = '<ul class="pagination pagination-sm">
                '.$pageItem.'
            </ul>';

        }

        return $html;
    }

    private function getQueryString()
    {
        $queryArr = [];
        $query = request()->getParams();
        if (!empty($query)) {
            $queryArr = explode('&', $query);

            $page = request()->page;

            $key = array_search('page='.$page, $queryArr);

            if ($key >= 0) {
                unset($queryArr[0]);
            }
        }

        $query = implode('&', $queryArr);
        return $query ? '&'.$query : null;
    }


    private function getPage()
    {
        $page = request('page', 1);

        if ($page <= 0 || $page > $this->maxPage) {
            $page = 1;
        }

        return $page;
    }

    private function createSql($sql, $limit, $offset = 0)
    {
        $sql.=" LIMIT $limit OFFSET $offset";
        return $sql;
    }
}

//Phân trang

/*
limit => config
page => params trên url

=> Trả về dữ liệu của model theo limit => 1 phương thức

=> render danh sách trang

- tổng số trang => phụ thuộc vào model cần limit
- trang hiện tại => lấy từ params

$users
$posts
*/
