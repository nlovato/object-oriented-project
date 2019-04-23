<?php
namespace nmarshlovato\ObjectOrientedProject;
require_once("autoload.php");
require_once(dirname(__DIR__,2) . "/vendor/autoload.php");
use Ramsey\Uuid\Uuid;
/**
 * Cross Section of an Author
 *
 * This is a cross section of what is probably stored about an author. This entity is a top level entity that
 * holds the keys to the other entities in this example.
 *
 * @author Natasha Lovato <nmarshlovato@cnm.edu>
 * @version 1.0.0
 **/
class Author {
	use ValidateUuid;
	use ValidateDate;
	/**
	 * id and P.K. for author
	 * @var string Uuid $authorId
	 */
	private $authorId;
	/**
	 * Avatar for this Profile;
	 * @var $authorAvatarUrl
	 **/
	private $authorAvatarUrl;
	/**
	 *This is the activation token verifying author isn't malicious
	 * @var $authorActivationToken
	 */
	private $authorActivationToken;
	/**
	 * This is the authors email, this is a unique index;
	 * @var $authorEmail
	 */
	private $authorEmail;
	/**
	 * This is part of password protection;
	 * @var $authorHash
	 */
	private $authorHash;
	/**
	 * This is the authors username, its unique;
	 * @var $authorUsername
	 */
	private $authorUsername;
	/**
	 * constructor for this Author
	 *
	 * @param string|Uuid $newAuthorId id of this Author or null if a new Author.
	 * @param string $newAuthorAvatarUrl url for authors avatar.
	 * @param string $newAuthorActivationToken string containing activation token.
	 * @param string $newAuthorEmail authors email address.
	 * @param string $newAuthorHash string for authors password.
	 * @param string $newAuthorUsername string containing authors username.
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newAuthorId, string $newAuthorAvatarUrl, string $newAuthorActivationToken,
										 string $newAuthorEmail, string $newAuthorHash, string $newAuthorUsername = null) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		}
			//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 *Accessor method for authorId
	 * @return string|Uuid for authorId (or null if new Profile)
	 */
	public function getAuthorId():Uuid {
		return($this->authorId);
	}
	/**
	 * mutator method for author id
	 *
	 * @param  string $newAuthorId value of new author id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if the author Id is not positive
	 **/
	public function setAuthorId($newAuthorId): void {
		try {
			$uuid = self::ValidateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the author id
		$this->authorId = $uuid;
	}
	/**
	 *Accessor method for authorAvatarUrl
	 *@return string for avatarUrl
	 */
	public function getAuthorAvatarUrl(): ?string {
		return ($this->authorAvatarUrl);
	}
	/**
	 * mutator method for author avatar url
	 *
	 * @param  string $newAuthorAvatarUrl value of new author url
	 * @throws \InvalidArgumentException if $newAuthorAvatarUrl is not a valid url or insecure
	 * @throws \RangeException if $newAuthorAvatarUrl is over charset
	 * @throws \TypeError if the author avatar url is not a string
	 **/
	public function setAuthorAvatarUrl(?string $newAuthorAvatarUrl): void {
		if($newAuthorAvatarUrl === null) {
			$this->authorAvatarUrl = $newAuthorAvatarUrl;
			return;
		}
		$newAuthorAvatarUrl = strtolower(trim($newAuthorAvatarUrl));
		if(ctype_xdigit($newAuthorAvatarUrl) === false) {
			throw(new\TypeError("user url is not valid"));
		}
		//make sure author avatar url is less than 255 characters
		if(strlen($newAuthorAvatarUrl) >255) {
			throw(new\RangeException("user url has to be less than 255"));
		}
		// convert and store the avatar url
		$this->authorAvatarUrl = $newAuthorAvatarUrl;
	}
	/**
	 *Accessor method for authorActivationToken
	 *@return string for authorActivationToken
	 */
	public function getAuthorActivationToken(): ?string {
		return ($this->authorActivationToken);
	}
	/**
	 * mutator method for author activation token
	 *
	 * @param  string $newAuthorActivationToken value of new author activation token
	 * @throws \InvalidArgumentException if $newAuthorActivationToken is not a valid url or insecure
	 * @throws \RangeException if $newAuthorActivationToken is over charset
	 * @throws \TypeError if the author avatar activation is not a string
	 **/
	public function setAuthorActivationToken(?string $newAuthorActivationToken): void {
		if($newAuthorActivationToken === null) {
			$this->authorActivationToken = $newAuthorActivationToken;
			return;
		}
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		if(ctype_xdigit($newAuthorActivationToken) === false) {
			throw(new\TypeError("user activation is not valid"));
		}
		//make sure author avatar url is less than 32 characters
		if(strlen($newAuthorActivationToken) >32) {
			throw(new\RangeException("user activation token has to be less than 32"));
		}
		// convert and store the activation token
		$this->authorActivationToken = $newAuthorActivationToken;
	}
	/**
	 *Accessor method for authorEmail
	 *@return string for authorEmail
	 */
	public function getAuthorEmail(): ?string {
		return ($this->authorEmail);
	}
	/**
	 * mutator method for author email
	 *
	 * @param  string $newAuthorEmail value of new author email
	 * @throws \InvalidArgumentException if $newAuthorEmail is not a valid email or insecure
	 * @throws \RangeException if $newAuthorEmail is over charset
	 * @throws \TypeError if the author email is not a string
	 **/
	public function setAuthorEmail(?string $newAuthorEmail): void {
		if($newAuthorEmail === null) {
			$this->$newAuthorEmail = null;
			return;
		}
		$newAuthorEmail = strtolower(trim($newAuthorEmail));
		if(ctype_xdigit($newAuthorEmail) === false) {
			throw(new\TypeError("user email is not valid"));
		}
		//make sure author email is less than 128 characters
		if(strlen($newAuthorEmail) >128) {
			throw(new\RangeException("user email has to be less than 128"));
		}
		// convert and store the new email.
		$this->authorEmail = $newAuthorEmail;
	}
	/**
	 *Accessor method for authorHash
	 *@return string for authorHash
	 */
	public function getAuthorHash(): ?string {
		return ($this->authorHash);
	}
	/**
	 * mutator method for author hash
	 *
	 * @param  string $newAuthorHash value of new author email
	 * @throws \InvalidArgumentException if $newAuthorHash is not a valid hash key or insecure
	 * @throws \RangeException if $newAuthorHash is over charset
	 * @throws \TypeError if the author hash is not a string
	 **/
	public function setAuthorHash(?string $newAuthorHash): void {
		if($newAuthorHash === null) {
			$this->$newAuthorHash = null;
			return;
		}
		$newAuthorHash = strtolower(trim($newAuthorHash));
		if(ctype_xdigit($newAuthorHash) === false) {
			throw(new\TypeError("user hash is not valid"));
		}
		//make sure author hash is less than 97 characters
		if(strlen($newAuthorHash) >97) {
			throw(new\RangeException("user hash has to be less than 97"));
		}
		// convert and store the new hash.
		$this->authorHash = $newAuthorHash;
	}
	/**
	 *Accessor method for authorUsername
	 *@return string for authorUsername
	 */
	public function getAuthorUsername(): ?string {
		return ($this->authorUsername);
	}
	/**
	 * mutator method for author username
	 *
	 * @param  string $newAuthorUsername value of new author username
	 * @throws \InvalidArgumentException if $newAuthorUsername is not a valid hash key or insecure
	 * @throws \RangeException if $newAuthorUsername is over charset
	 * @throws \TypeError if the author username is not a string
	 **/
	public function setAuthorUsername(?string $newAuthorUsername): void {
		if($newAuthorUsername === null) {
			$this->$newAuthorUsername = null;
			return;
		}
		$newAuthorUsername = strtolower(trim($newAuthorUsername));
		if(ctype_xdigit($newAuthorUsername) === false) {
			throw(new\TypeError("username is not valid"));
		}
		//make sure author hash is less than 97 characters
		if(strlen($newAuthorUsername) > 32) {
			throw(new\RangeException("username has to be less than 32"));
		}
		// convert and store the new username.
		$this->authorUsername = $newAuthorUsername;
	}
	/**
	 * inserts into authors mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {
		// create query template
		$query = "INSERT INTO author(authorId, authorAvatarUrl, authorActivationToken, authorEmail, authorHash, authorUsername) 
VALUES(:authorId, :authorAvatarUrl, :authorActivationToken, :authorEmail, :authorHash, :authorUsername)";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["authorId" => $this->authorId->getBytes(), "authorAvatarUrl" => $this->authorAvatarUrl,
			"authorActivationToken" => $this->authorActivationToken, "authorEmail" => $this->authorEmail,
			"authorHash" => $this->authorHash, "authorUsername" => $this->authorUsername];
		$statement->execute($parameters);
	}
	/**
	 * deletes this Author from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {
		// create query template
		$query = "DELETE FROM author WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holder in the template
		$parameters = ["authorId" => $this->authorId->getBytes()];
		$statement->execute($parameters);
	}
	/**
	 * updates this Author in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {
		// create query template
		$query = "UPDATE author SET authorEmail = :authorEmail, authorUsername = :authorUsername, 
	authorAvatarUrl = :authorAvatarUrl, authorActivationToken = :authorActivationToken, authorHash = :authorHash  WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);
		$parameters = ["authorId" => $this->authorId->getBytes(), "authorAvatarUrl" => $this->authorAvatarUrl,
			"authorActivationToken" => $this->authorActivationToken, "authorEmail" => $this->authorEmail,
			"authorHash" => $this->authorHash, "authorUsername" => $this->authorUsername];
		$statement->execute($parameters);
	}}