<?php
namespace BusinessService;

class CardSecurity
{
    private $cardName;
    private $cvv;
    private $cardNumber;
    private $expMonth;
    private $expYear;
    
    function __construct($name, $cvv, $number, $month, $year)
    {
        $this->cardName = $name;
        $this->cvv = $cvv;
        $this->cardNumber = $number;
        $this->expMonth = $month;
        $this->expYear = $year;
    }
    
    public function authenticateCard()
    {
        $link = dbConnection();
        $sql = "SELECT * FROM cards WHERE OWNER = '$this->cardName'";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) == 0)
        {
            $result->free();
            mysqli_close($link);
            return false;
        }
        elseif(mysqli_num_rows($result) == 1)
        {
            $row = $result->fetch_assoc();
            
            if($row["CARD_NUMBER"] == $this->cardNumber && $row["EXP_MONTH"] == $this->expMonth
                && $row["EXP_YEAR"] == $this->expYear && $row["CARD_CVV"] == $this->cvv) {
                $result->free();
                mysqli_close($link);
                return true;
            }
        }
        else
        {
            die("ERROR: Connection error occurred: " . mysqli_connect_error());
        }
        $result->free();
        mysqli_close($link);
        return false;
    }
    
    public function storeCard()
    {
        $link = dbConnection();
        $userID = getUserID();
        $sql = "INSERT INTO cards (ID_USER, OWNER, CARD_NUMBER, EXP_MONTH, EXP_YEAR, CARD_CVV) VALUES ('$userID', '$this->cardName',
            '$this->cardNumber', '$this->expMonth', '$this->expYear', '$this->cvv')";
        
        if(mysqli_query($link, $sql))
        {
            mysqli_close($link);
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>