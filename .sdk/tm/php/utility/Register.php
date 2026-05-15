<?php
declare(strict_types=1);

// Pokefact SDK utility registration

require_once __DIR__ . '/../core/UtilityType.php';
require_once __DIR__ . '/Clean.php';
require_once __DIR__ . '/Done.php';
require_once __DIR__ . '/MakeError.php';
require_once __DIR__ . '/FeatureAdd.php';
require_once __DIR__ . '/FeatureHook.php';
require_once __DIR__ . '/FeatureInit.php';
require_once __DIR__ . '/Fetcher.php';
require_once __DIR__ . '/MakeFetchDef.php';
require_once __DIR__ . '/MakeContext.php';
require_once __DIR__ . '/MakeOptions.php';
require_once __DIR__ . '/MakeRequest.php';
require_once __DIR__ . '/MakeResponse.php';
require_once __DIR__ . '/MakeResult.php';
require_once __DIR__ . '/MakePoint.php';
require_once __DIR__ . '/MakeSpec.php';
require_once __DIR__ . '/MakeUrl.php';
require_once __DIR__ . '/Param.php';
require_once __DIR__ . '/PrepareAuth.php';
require_once __DIR__ . '/PrepareBody.php';
require_once __DIR__ . '/PrepareHeaders.php';
require_once __DIR__ . '/PrepareMethod.php';
require_once __DIR__ . '/PrepareParams.php';
require_once __DIR__ . '/PreparePath.php';
require_once __DIR__ . '/PrepareQuery.php';
require_once __DIR__ . '/ResultBasic.php';
require_once __DIR__ . '/ResultBody.php';
require_once __DIR__ . '/ResultHeaders.php';
require_once __DIR__ . '/TransformRequest.php';
require_once __DIR__ . '/TransformResponse.php';

PokefactUtility::setRegistrar(function (PokefactUtility $u): void {
    $u->clean = [PokefactClean::class, 'call'];
    $u->done = [PokefactDone::class, 'call'];
    $u->make_error = [PokefactMakeError::class, 'call'];
    $u->feature_add = [PokefactFeatureAdd::class, 'call'];
    $u->feature_hook = [PokefactFeatureHook::class, 'call'];
    $u->feature_init = [PokefactFeatureInit::class, 'call'];
    $u->fetcher = [PokefactFetcher::class, 'call'];
    $u->make_fetch_def = [PokefactMakeFetchDef::class, 'call'];
    $u->make_context = [PokefactMakeContext::class, 'call'];
    $u->make_options = [PokefactMakeOptions::class, 'call'];
    $u->make_request = [PokefactMakeRequest::class, 'call'];
    $u->make_response = [PokefactMakeResponse::class, 'call'];
    $u->make_result = [PokefactMakeResult::class, 'call'];
    $u->make_point = [PokefactMakePoint::class, 'call'];
    $u->make_spec = [PokefactMakeSpec::class, 'call'];
    $u->make_url = [PokefactMakeUrl::class, 'call'];
    $u->param = [PokefactParam::class, 'call'];
    $u->prepare_auth = [PokefactPrepareAuth::class, 'call'];
    $u->prepare_body = [PokefactPrepareBody::class, 'call'];
    $u->prepare_headers = [PokefactPrepareHeaders::class, 'call'];
    $u->prepare_method = [PokefactPrepareMethod::class, 'call'];
    $u->prepare_params = [PokefactPrepareParams::class, 'call'];
    $u->prepare_path = [PokefactPreparePath::class, 'call'];
    $u->prepare_query = [PokefactPrepareQuery::class, 'call'];
    $u->result_basic = [PokefactResultBasic::class, 'call'];
    $u->result_body = [PokefactResultBody::class, 'call'];
    $u->result_headers = [PokefactResultHeaders::class, 'call'];
    $u->transform_request = [PokefactTransformRequest::class, 'call'];
    $u->transform_response = [PokefactTransformResponse::class, 'call'];
});
