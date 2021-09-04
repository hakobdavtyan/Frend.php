<?php



class Posts
{
    public $title;
    public $content;
    public $table=POSTS;
    public $conn;

    /**
     * User constructor.
     */
    public function __construct($title, $desc)
    {
        $this->title = $title;
        $this->content = $desc;
        $this->conn = new DB();
    }


    public function create_post($obj)
    {
        $this->conn->create($obj);
    }

    public function show_all_posts()
    {
        return $this->conn->all($this->table);
    }
}