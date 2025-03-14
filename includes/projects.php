<?php
    include_once "env.php";

    /**
     * @param string $repoName
     * @return mixed
     */
    function fetchRepoLanguages(string $repoName): mixed {
        global $githubUsername, $cacheDir, $cacheTime;
        $langCacheFile = "$cacheDir/lang_$repoName.json";

        if (file_exists($langCacheFile) && (time() - filemtime($langCacheFile) < $cacheTime)) {
            return json_decode(file_get_contents($langCacheFile), true);
        }

        $langUrl = "https://api.github.com/repos/$githubUsername/$repoName/languages";
        return getFromGitHubApi($langUrl, $langCacheFile);
    }

    /**
     * @param string $repoName
     * @return int|mixed
     */
    function fetchRepoCommitsTotal(string $repoName): mixed {
        global $githubUsername, $cacheDir, $cacheTime, $GITHUB_ACCESS_TOKEN;
        $commitCacheFile = "$cacheDir/commits_$repoName.json";

        if (file_exists($commitCacheFile) && (time() - filemtime($commitCacheFile) < $cacheTime)) {
            return json_decode(file_get_contents($commitCacheFile), true);
        }

        $commitUrl = "https://api.github.com/repos/$githubUsername/$repoName/stats/contributors";
        $commitData = getFromGitHubApi($commitUrl, $commitCacheFile);

        if (is_array($commitData)) {
            foreach ($commitData as $contributor) {
                if ($contributor['author']['login'] === $githubUsername) {
                    $totalCommits = $contributor['total'];
                    file_put_contents($commitCacheFile, json_encode($totalCommits));
                    return $totalCommits;
                }
            }
        }

        return 0;
    }

    /**
     * Fetches the latest release info for a repository.
     *
     * @param string $repoName
     * @return mixed
     */
    function fetchRepoLatestRelease(string $repoName): mixed {
        global $githubUsername, $cacheDir, $cacheTime;
        $releaseCacheFile = "$cacheDir/release_$repoName.json";

        if (file_exists($releaseCacheFile) && (time() - filemtime($releaseCacheFile) < $cacheTime)) {
            $result = json_decode(file_get_contents($releaseCacheFile), true);
        } else {
            $releaseUrl = "https://api.github.com/repos/$githubUsername/$repoName/releases";
            $result = getFromGitHubApi($releaseUrl, $releaseCacheFile) ?? null;
        }

        if ($result != null) $result = end($result);

        return $result;
    }

    /**
     * @param string $apiUrl
     * @param string $cacheFile
     * @return mixed
     */
    function getFromGitHubApi(string $apiUrl, string $cacheFile): mixed {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

        if (!empty($GITHUB_ACCESS_TOKEN)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Authorization: token $GITHUB_ACCESS_TOKEN"
            ]);
        }
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if ($data && !isset($data['message'])) {
            file_put_contents($cacheFile, json_encode($data, JSON_PRETTY_PRINT));
        }
        return $data;
    }

    $githubUsername = "echtermax";
    $apiUrl = "https://api.github.com/users/$githubUsername/repos?sort=updated&per_page=6";
    $cacheDir = "cache";
    $cacheFile = "$cacheDir/github_repos.json";
    $cacheTime = 3600;

    $languageColors = [
        "JavaScript"    => "#f1e05a",
        "Python"        => "#3572A5",
        "PHP"           => "#4F5D95",
        "Java"          => "#b07219",
        "C++"           => "#f34b7d",
        "C#"            => "#178600",
        "HTML"          => "#e34c26",
        "CSS"           => "#563d7c",
        "TypeScript"    => "#3178c6",
        "Go"            => "#00ADD8",
        "Swift"         => "#ffac45",
        "Ruby"          => "#701516",
        "Rust"          => "#dea584",
        "Kotlin"        => "#F18E33",
        "Dart"          => "#00B4AB",
        "Other"         => "#cccccc"
    ];

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
        $repos = json_decode(file_get_contents($cacheFile), true);
    } else {
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0777, true);
            file_put_contents($cacheFile, json_encode([]));
        } elseif (!file_exists($cacheFile)) {
            file_put_contents($cacheFile, json_encode([]));
        }
        $repos = getFromGitHubApi($apiUrl, $cacheFile);
    }
?>

<?php if ($repos && !isset($repos['message'])): ?>
    <?php foreach ($repos as $repo): ?>
        <?php
        $languages = fetchRepoLanguages($repo['name']);
        $totalBytes = array_sum($languages);
        $totalCommits = fetchRepoCommitsTotal($repo['name']);
        $latestRelease = fetchRepoLatestRelease($repo['name']);
        $repoId = htmlspecialchars($repo['name']);
        ?>
        <div class="project-card">
            <div class="project-info">
                <h3><?= htmlspecialchars($repo['name']) ?></h3>
                <h4><span><?= htmlspecialchars($repo['description'] ?: "Keine Beschreibung verfügbar.") ?></span></h4>
                <p>Letztes Update: <span class="value"><?= date("d.m.Y", strtotime($repo['updated_at'])) ?></span></p>
                <p>Anzahl Commits: <span class="value"><?= $totalCommits ?></span></p>
                <p>Letzter Release: <span class="value"><?= $latestRelease['name'] ?? "Kein Release verfügbar" ?></span></p>

                <div class="language-bar" onclick="openLanguageModal('<?= $repoId ?>')">
                    <?php foreach ($languages as $lang => $bytes):
                        $percentage = ($bytes / $totalBytes) * 100;
                        $color = $languageColors[$lang] ?? "#cccccc";
                        ?>
                        <div title="<?= $lang ?>" style="width: <?= round($percentage, 2) ?>%; background-color: <?= $color ?>;"></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if (!empty($repo['homepage'])): ?>
                <div class="button-container">
                    <a href="<?= htmlspecialchars($repo['html_url']) ?>" target="_blank" class="btn github-btn">Repository</a>
                    <a href="<?= htmlspecialchars($repo['homepage']) ?>" target="_blank" class="btn website-btn">Website</a>
                </div>
            <?php else: ?>
                <div class="button-container single-btn">
                    <a href="<?= htmlspecialchars($repo['html_url']) ?>" target="_blank" class="btn github-btn">Repository</a>
                </div>
            <?php endif; ?>
        </div>

        <div id="language-modal-<?= $repoId ?>" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeLanguageModal('<?= $repoId ?>')">&times;</span>
                <h2>Sprachen für <?= htmlspecialchars($repo['name']) ?></h2>
                <div class="language-bar">
                    <?php foreach ($languages as $lang => $bytes):
                        $percentage = ($bytes / $totalBytes) * 100;
                        $color = $languageColors[$lang] ?? "#cccccc";
                        ?>
                        <div title="<?= $lang ?>" style="width: <?= round($percentage, 2) ?>%; border-bottom: 8px solid <?= $color ?>;"><?= $lang ?></div>
                    <?php endforeach; ?>
                </div>
                <div class="language-bar">
                    <?php foreach ($languages as $lang => $bytes):
                        $percentage = ($bytes / $totalBytes) * 100;
                        $color = $languageColors[$lang] ?? "#cccccc";
                        ?>
                        <div title="<?= $lang ?>" style="width: <?= round($percentage, 2) ?>%;"><?= round($percentage, 2) ?>%</div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>