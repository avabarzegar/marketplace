<?php 

// include ('db_credentials.php'); 


/* 
 * This class is used for database related operations (connect and fetch) 
 */ 
 
class Product{ 
    private $dbHost     = DB_SERVER; 
    private $dbUsername = DB_USER; 
    private $dbPassword = DB_PASS; 
    private $dbName     = DB_NAME; 
    private $tblName    = 'products'; 

    private $db;
     
    public function __construct(){ 
        if(!isset($this->db)){ 
            // Connect to the database 
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); 
            if($conn->connect_error){ 
                die("Failed to connect with MySQL: " . $conn->connect_error); 
            }else{ 
                $this->db = $conn; 
            } 
        } 
    } 
    /* 
     * Returns rows from the database based on the conditions 
     * @param array select, where, search, order_by, limit and return_type conditions 
     */ 
    public function getRows($conditions = array()) {
    $sql = 'SELECT ';
    $sql .= array_key_exists("select", $conditions) ? $conditions['select'] : '*';
    $sql .= ' FROM ' . $this->tblName;

    if (array_key_exists("where", $conditions)) {
        $sql .= ' WHERE ';
        $whereConditions = array();
        foreach ($conditions['where'] as $key => $value) {
            $whereConditions[] = $key . " = '" . $value . "'";
        }
        $sql .= implode(' AND ', $whereConditions);
    }

    if (array_key_exists("search", $conditions)) {
        $sql .= (strpos($sql, 'WHERE') !== false) ? ' AND ' : ' WHERE ';
        $searchConditions = array();
        foreach ($conditions['search'] as $key => $value) {
            $searchConditions[] = $key . " LIKE '%" . $value . "%'";
        }
        $sql .= '(' . implode(' OR ', $searchConditions) . ')';
    }

    if (array_key_exists("order_by", $conditions)) {
        $sql .= ' ORDER BY ' . $conditions['order_by'];
    } else {
        $sql .= ' ORDER BY ProductID DESC ';
    }

    if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
        $sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
    } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
        $sql .= ' LIMIT ' . $conditions['limit'];
    }

    $result = $this->db->query($sql);

    if (array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all') {
        switch ($conditions['return_type']) {
            case 'count':
                $data = $result->num_rows;
                break;
            case 'single':
                $data = $result->fetch_assoc();
                break;
            default:
                $data = '';
        }
    } else {
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
    }
    return $data;
}

}